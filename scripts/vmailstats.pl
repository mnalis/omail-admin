#!/usr/bin/perl
#
#        -----------
#        oMail-admin  -  A PHP4 based Vmailmgrd Web interface
#        -----------
#
#        * Copyright (C) 2004  Olivier Mueller <om@omnis.ch>
#
#        $Id: vmailstats.pl,v 1.1 2004/02/14 23:17:23 swix Exp $
#        $Source: /cvsroot/omail/admin2/scripts/vmailstats.pl,v $#
#
#        vmailstats.pl
#        -------------
#        server vmailmgr stats, to be run by cron on a daily/hourly basis
#
#        14.feb.04   om   First version
#
#        This program is free software; you can redistribute it and/or modify
#        it under the terms of the GNU General Public License as published by
#        the Free Software Foundation; either version 2 of the License, or
#        (at your option) any later version.
#
#        This program is distributed in the hope that it will be useful,
#        but WITHOUT ANY WARRANTY; without even the implied warranty of
#        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#        GNU General Public License for more details.
#  
#        You should have received a copy of the GNU General Public License
#        along with this program; if not, write to the Free Software
#        Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
#

use strict;

### user configuration ##########################################

my $target_directory = "/var/vmailstats"; 

my $virtualdomains = "/var/qmail/control/virtualdomains";

my $cmd_du = "/usr/bin/du";
my $cmd_ls = "/bin/ls";
my $cmd_wc = "/usr/bin/wc";
my $cmd_cp = "/bin/cp";

my $vmailmgr_dir = "users";

### end of user configuration ##################################


if (!-d $target_directory) { die "$target_directory does not exist"; }
my $now = time;

open(DOMAINS, $virtualdomains) || die "cannot open $virtualdomains";

my $domain = "";
my $username = "";
my $uid = "";
my %uids = ();
my ($name,$passwd,$uid,$gid,$quota,$comment,$gcos,$dir,$shell,$expire);

my $global_domains = 0;
my $global_total_size = 0;
my $global_accounts = 0;

my $total_size = 0;
my $account_size = 0;
my $account_cur_size = 0;
my $account_new_size = 0;
my $account_cur_nb = 0;
my $account_new_nb = 0;

my $source_file = "";
my $target_file = "";
my $target_maildir = "";

open(GLOBALSTATS, ">$target_directory/globalstats") || die "cannot write to globalstats";

while (my $line = <DOMAINS>) { 

	chomp $line;
	($domain,$username) = split(/:/, $line);
	$uid = getpwnam($username);
	($name,$passwd,$uid,$gid,$quota,$comment,$gcos,$dir,$shell,$expire) = getpwuid($uid);

	if (!-d "$dir/$vmailmgr_dir") { next; }

	$global_domains++;
	$target_file = $target_directory . "/" . $domain;

	if (!$uids{$username}) { 

		open(OUT, ">$target_file") || die "cannot write to $target_file";

		# 1. get total vmailmgr accounts directory size
	
		$total_size = 0 + `$cmd_du -k -s $dir/$vmailmgr_dir`;
		print OUT "total_dir_size\t$total_size\n";

		$uids{$username} = $domain;
		$global_total_size += $total_size;
		print GLOBALSTATS "$total_size\t$domain\t$dir\t$username\t$uid\n";


		# 2. get list of mailboxes

		opendir(MDIR, "$dir/$vmailmgr_dir") || die "cannot read $dir/$vmailmgr_dir";
		while(my $maildir = readdir(MDIR)) { 
			next if ($maildir eq "." || $maildir eq "..");		
	
			$global_accounts++;
	
			$account_size = 0;
			$account_cur_size = 0;
			$account_new_size = 0;
			$account_cur_nb = 0;
			$account_new_nb = 0;

			$target_maildir = "$dir/$vmailmgr_dir/$maildir";
			next if (!-d $target_maildir);
	
			# get size of maildir	

			$account_size = 0 + `$cmd_du -k -s $target_maildir`;
			$account_cur_size = 0 + `$cmd_du -k -s "$target_maildir/cur"` if (-d "$target_maildir/cur");
			$account_new_size = 0 + `$cmd_du -k -s "$target_maildir/new"` if (-d "$target_maildir/new");
			$account_cur_nb = 0 + `$cmd_ls -A -1 "$target_maildir/cur/" | $cmd_wc -l` if (-d "$target_maildir/cur");
			$account_new_nb = 0 + `$cmd_ls -A -1 "$target_maildir/new/" | $cmd_wc -l` if (-d "$target_maildir/new");

			$maildir = lc($maildir);
			$maildir =~ s/\:/\./g;

			print OUT "$maildir\t$account_size\t$account_cur_size\t$account_new_size\t$account_cur_nb\t$account_new_nb\t\n";
	
		}
		closedir(MDIR);
		close(OUT);
	} else {

		# domain alias (same username) : just copy the "mother" file 
		# instead of recalculating everything

		$source_file = $target_directory . "/" . $uids{$username};
		system($cmd_cp,$source_file, $target_file);
	} 
}

close(DOMAINS);

my $now2 = time;

print GLOBALSTATS "\n\n\tfinished: " . ($now2-$now) . " seconds elapsed\n";
print GLOBALSTATS "\t$global_total_size kB on $global_accounts accounts ($global_domains domains): " . int($global_total_size/$global_accounts)  . " kB/account\n";

close(GLOBALSTATS);
