<?php

/*
        -----------
        oMail-admin  -  A PHP4 based Vmailmgrd Web interface
        -----------

        * Copyright (C) 2000  Simon Häusermann, insign gmbh
  	  Version:		3.51

        $Id: mysql.inc,v 1.1 2003/01/29 21:36:54 swix Exp $
        $Source: /cvsroot/omail/admin2/mysql.inc,v $

        mysql.inc
        ---------

        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation; either version 2 of the License, or
        (at your option) any later version.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.
  
        You should have received a copy of the GNU General Public License
        along with this program; if not, write to the Free Software
        Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/


/*

*/

class table
{
    // DEBIGING INFORMATIONS //
    var $debugColor = "blue";
    ///////////////////////////

	var $dbName;			// name of the database
	var $tabName;			// name of the table
	var $server;			// name of the host which runs the mysqld
	var $userName;			// name of the user which connects to the mysqld
	var $dbPassword;		// the password of the mysql user

    var $fieldResult;
    var $numFields = -1; 	// the number of fields in the actual table
    var $numTableRows;		// Nuber of rows in table
    var $numQueryRows;		// the number of rows in the actual query result table
    var $fieldArray;			// Array with all fieldnames
    var $queryArray;
    var $dbInt;				// Database identifyer

    var $queryResult;        // Pointer to result from query
    var $queryIndex;			// Pointer to actual row in query
    var $queryString;

    var $condition;
    var $attributes;


	/*******************************************************************************/

	// constructor
	function table($dbName,$tabName,$server,$userName,$dbPassword)
	{
         $this->tabName = $tabName;
		$this->dbName = $dbName;
		$this->server = $server;
		$this->userName = $userName;
		$this->dbPassword = $dbPassword;

        /////////////////////////////////////////////////
        $this->debug("open table: $dbName,$tabName,$server,$userName,$dbPassword");
        /////////////////////////////////////////////////

		$this->dbInt = mysql_connect($server,$userName,$dbPassword) or die ("mysqladmin: Unable to connect to database (Server: $server, User: $userName)! ");
		mysql_select_db($this->dbName,$this->dbInt) or die ("mysqladmin: Error opening database (db: $dbName)!");

        // global query - set number of query rows
        if (!$this->queryResult=@mysql_query("SELECT * FROM ".$this->tabName,$this->dbInt))
        {
        		print "mysqladmin: table ".$this->tabName." does not exist!<br>";
        }
        $this->numTableRows = mysql_num_rows($this->queryResult);
        $this->fieldArray = $this->getFieldNames();
    }

    // public function
    function sql($queryString,$useold=false)
    {
    		global $globar;
         mysql_select_db($this->dbName,$this->dbInt);

         $queryString = str_replace("<table>",$this->tabName,$queryString);
    		/////////////////////////////////////////////////
         $this->debug("sql: $queryString");
         /////////////////////////////////////////////////
         $this->queryString = $queryString;

         if (!($this->queryResult = mysql_query($queryString,$this->dbInt)))
         {
             /////////////////////////////////////////////////
             $this->debug ("<b>query failed... error: ".mysql_error()."</b><br>");
             /////////////////////////////////////////////////
        		return false;
         }

         if (!$useold || strpos($queryString,"UPDATE")!=0 || strpos($queryString,"INSERT")!=0 || strpos($queryString,"DELETE")!=0)
         {
        		// fill all query-field-names into $this->queryArray
        		$this->queryArray = array();
        		$cnt = mysql_num_fields($this->queryResult);
        		for ($i=0; $i<$cnt; $i++)
        		{
        			$tmpObj = mysql_fetch_field($this->queryResult);
            		$this->queryArray[] = $tmpObj->name;
        		}

        		if ($this->numQueryRows = @mysql_num_rows($this->queryResult))
        			$this->queryIndex = 0;
        		else
        			$this->numQueryRows = 0;
        		/////////////////////////////////////////////////
        		$this->debug("sql: numRows: ".$this->numQueryRows);
        		/////////////////////////////////////////////////
         }
         return true;
    }

    // public function
	function query($attributes="*",$condition="",$orderBy="")
	{
        $this->attributes = $attributes;
        $this->condition = $condition;

        /////////////////////////////////////////////////
        $this->debug("query: $attributes,$condition,$orderBy");
        /////////////////////////////////////////////////

        if ($orderBy!="")
        		$orderBy = "order by ".$orderBy;

		if ($attributes == "")
		{
			$attributes = "*";
		}
         else
         {
        		if ($attributes!="*" and !strpos($attributes,",id,") and !strpos($attributes,",id") and strpos($attributes,"id,")!=0 and $attributes!="id" and !strpos($attributes,"COUNT("))
            		$attributes = "id,".$attributes;
         }

		if ($condition == "")
        		$queryString = "SELECT $attributes FROM ".$this->tabName." $orderBy";
		else
        		$queryString = "SELECT $attributes FROM ".$this->tabName." WHERE $condition $orderBy";

        /////////////////////////////////////////////////
        $this->debug("query: $queryString");
        /////////////////////////////////////////////////
        $this->sql($queryString);

        return true;
  	}

  	// public function
  	function countQueryRows()
	{
    		/////////////////////////////////////////////////
         $this->debug("countQueryRows: ".$this->numQueryRows);
         /////////////////////////////////////////////////
		return $this->numQueryRows;
	}

	// public function
  	function countTableRows()
	{
    		/////////////////////////////////////////////////
         $this->debug("countTableRows: ".$this->numTableRows);
         /////////////////////////////////////////////////
		return $this->numTableRows;
	}

	// public function (return a row array at position queryIndex)
	function getQueryRow()
	{
    		global $globar;
    		mysql_select_db($this->dbName,$this->dbInt);
    		/////////////////////////////////////////////////
         $this->debug("getQueryRow: ".$this->queryResult."(result):".$this->queryIndex)."(index)";
         /////////////////////////////////////////////////

	    mysql_data_seek($this->queryResult,$this->queryIndex);
	    if ($actualRow = mysql_fetch_array($this->queryResult,MYSQL_ASSOC))
	    {
            $cnt = count($this->queryArray);
            for ($i=0; $i<$cnt; $i++)
            {
            		if (!isset($actualRow[$this->queryArray[$i]]))
             	{
                    /////////////////////////////////////////////////
        			   $this->debug("getQueryRow: empty field ".$this->queryArray[$i]." added");
        			   /////////////////////////////////////////////////
                    $actualRow[$this->queryArray[$i]] = "";
                }
            }
            return $actualRow;
	    }
	    else
	    {
            return false;
	    }
  	}

    // public function (only for compability)
    function getTableRow()
    {
     	$this->getQueryRow();
        return true;
    }

  	// public function (set a whole row at position queryIndex)
	function setQueryRow($valuesArray="")
	{
    		mysql_select_db($this->dbName,$this->dbInt);
    		$tmpId = $this->queryIndex;

  		if ($valuesArray == "")
        		return false;

     	mysql_data_seek($this->queryResult,$this->queryIndex);
     	$actualRow = mysql_fetch_array($this->queryResult,MYSQL_ASSOC);
     	$pkey = $actualRow[id];

     	// check if fields are valid //
     	$nameAr = $this->getFieldNames();
     	$newAr = array();
     	for ($i=0; $i<count($nameAr); $i++)
     	{
        		if (isset($valuesArray[$nameAr[$i]]))
         	{
            		$newAr[$nameAr[$i]] = $valuesArray[$nameAr[$i]];
         	}
     	}
     	// end check //

     	unset($newAr[id]);
     	$newAr[id] = $pkey;

     	$setString = "";
     	while (list($key, $val) = each($newAr))
     	{
         	if (is_string($val) && $val!="NULL")
            		$val = "'".addslashes($val)."'";

         	$setString .= "$key=$val,";
		}
     	$setString = substr($setString,0,strlen($setString)-1); // kill last comma

     	$updateQuery = "UPDATE $this->tabName SET $setString WHERE id=$pkey";

     	/////////////////////////////////////////////////
     	$this->debug("setQueryRow: $updateQuery");
     	/////////////////////////////////////////////////

     	if ($updateResult = mysql_query($updateQuery,$this->dbInt))
     	{
        		$this->sql($this->queryString);
         	$this->queryIndex = $tmpId;
         	return true;
     	}
     	else
     	{
         	return false;
     	}
	}

     // public function (only for compatibility)
     function setTableRow($valuesArray="")
     {
         return $this->setQueryRow($valuesArray);
     }

	// public function
  	function newRow($valuesArray="")
	{
    	mysql_select_db($this->dbName,$this->dbInt);
    	$insertQuery = "INSERT INTO ".$this->tabName." (id) VALUES (NULL)";

        if (is_array($valuesArray))
        {
            	///////////////////////////////////////////////
        		$this->debug("NEWROW: existing array for new row");
        		///////////////////////////////////////////////
         	// check if fields are valid //
        		$nameAr = $this->getFieldNames();
        		$newAr = array();
        		for ($i=0; $i<count($nameAr); $i++)
       		{
            		if (isset($valuesArray[$nameAr[$i]]))
            		{
                		$newAr[$nameAr[$i]] = $valuesArray[$nameAr[$i]];
            		}
        		}
        		// end check //

            unset($newAr[id]);
            while (list($key,$val) = each($newAr))
            {
            		$fields = $fields . $key . ", ";
                 if (is_string($val) && $val!="NULL")
                		$val = "'".addslashes($val)."'"; // Add ' only if it's a string

                $values = $values.$val.", ";
            }
            $fields = substr($fields, 0, strlen($fields)-2);
            $values = substr($values, 0, strlen($values)-2);

            $insertQuery = "INSERT INTO ".$this->tabName." (id,$fields) VALUES (NULL,$values)";
  		}

        ///////////////////////////////////////////////
        $this->debug("NEWROW: $insertQuery");
        ///////////////////////////////////////////////

		if ($insertResult = mysql_query($insertQuery,$this->dbInt))
		{
			$insertId = mysql_insert_id();
            ///////////////////////////////////////////////
        		$this->debug("NEWROW (insertId): $insertId");
        	  	///////////////////////////////////////////////
			$this->query("*","id=$insertId");
			return $insertId;
		}
		else
		{
        	$this->debug("<b>insert query failed :( - " . mysql_error() . "</b>");
			return false;
		}
  	}

     // public function
     function updateRows($attributes,$condition="")
     {
    		mysql_select_db($this->dbName,$this->dbInt);
    		if ($condition == "")
        		$queryString = "UPDATE ".$this->tabName." SET $attributes";
        	else
        		$queryString = "UPDATE ".$this->tabName." SET $attributes WHERE $condition";

         if (mysql_query($queryString,$this->dbInt))
         {
         	$this->query();
         }
         else
         {
        		return false;
         }
     }

  	// public function
  	function getQueryField($field)
	{
        $rowAr = $this->getQueryRow();
        /////////////////////////////////////////////////
        $this->debug("getQueryField: ".$rowAr[$field]);
        /////////////////////////////////////////////////
        return $rowAr[$field];
  	}

  	// public function
  	function setQueryField($field,$value)
	{
    		$tmpId = $this->queryIndex;

     	mysql_data_seek($this->queryResult,$this->queryIndex);
     	$actualRow = mysql_fetch_array($this->queryResult,MYSQL_ASSOC);
     	$pkey = $actualRow['id'];

     	if (is_string($value) && $value!="NULL")
        		$value = "'".addslashes($value)."'";

     	$setQuery = "UPDATE ".$this->tabName." SET $field=$value WHERE id=$pkey";
     	/////////////////////////////////////////////////
		$this->debug("setQueryField: ".$setQuery);
     	/////////////////////////////////////////////////
         $setResult = mysql_query($setQuery,$this->dbInt);

         $this->sql($this->queryString);
         $this->queryIndex = $tmpId;
         return true;
  	}

  	// public function
  	function deleteRow()
	{
        mysql_data_seek($this->queryResult,$this->queryIndex);
        $actualRow = mysql_fetch_array($this->queryResult,MYSQL_ASSOC);
        $pkey = $actualRow[id];

        $deleteQuery = "DELETE FROM ".$this->tabName." WHERE id=$pkey";
        /////////////////////////////////////////////////
        $this->debug("deleteRow: ".$deleteQuery);
        /////////////////////////////////////////////////
	   $deleteResult = mysql_query($deleteQuery,$this->dbInt);

        $this->sql($this->queryString);

        return true;
  	}

    // works only after call of query();
    // public function
    function deleteRows()
    {
        mysql_select_db($this->dbName,$this->dbInt);

        if ($this->condition == "")
        		$deleteQuery = "DELETE FROM ".$this->tabName;
    	   else
        		$deleteQuery = "DELETE FROM ".$this->tabName." WHERE ".$this->condition;
        /////////////////////////////////////////////////
        $this->debug("deleteRows: ".$deleteQuery);
        /////////////////////////////////////////////////
        $deleteResult = mysql_query($deleteQuery,$this->dbInt);

        if (!($this->queryResult = mysql_query($deleteQuery,$this->dbInt)))
        {
        		//$this->sql($this->queryString);
        		$this->query();
            	return true;
        }
        else
        {
        		return false;
        }
    }

	// public function
	function moveNext()
	{
        if ($this->queryIndex+1>$this->numQueryRows)
        		return false;

	   $this->queryIndex++;
        /////////////////////////////////////////////////
        $this->debug("moveNext: -moveTo(".$this->queryIndex.") ");
        /////////////////////////////////////////////////
		return $this->queryIndex;
	}

	// public function
	function movePrev()
	{
        if ($this->queryIndex-1<0)
        		return false;

        $this->queryIndex--;
        /////////////////////////////////////////////////
        $this->debug("movePrev: -moveTo(".$this->queryIndex.") ");
        /////////////////////////////////////////////////
		return $this->queryIndex;
	}

	// public function
	function moveTo($newIndex)
	{
    		if ($newIndex<0)
         	return false;

    		if ($newIndex>$this->numQueryRows)
         	return false;

		$this->queryIndex = $newIndex;
         /////////////////////////////////////////////////
         $this->debug("moveTo: $newIndex");
         /////////////////////////////////////////////////
		return $this->queryIndex;
	}

    // public function
    function countFields()
    {
        if ($this->numFields==-1)
        {
            $this->fieldResult = mysql_list_fields($this->dbName,$this->tabName);
            $this->numFields = mysql_num_fields($this->fieldResult);
        }
		/////////////////////////////////////////////////
        $this->debug("countFields: ".$this->numFields);
        /////////////////////////////////////////////////
        return $this->numFields;
    }

	// public function
	function getFieldNames()
  	{
         $cnt = $this->countFields();
         for ($i=0; $i<$cnt; $i++)
  		{
  			$fieldNames[$i] = mysql_field_name($this->fieldResult,$i);
  		}
  		return $fieldNames;
  	}

  	// public function
  	function getFieldTypes()
  	{
         $cnt = $this->countFields();
         for ($i=0; $i<$cnt; $i++)
  		{
  			$fieldTypes[$i] = mysql_field_type($this->fieldResult,$i);
  		}
  		return $fieldTypes;
  	}

  	// public function
  	function getFieldFlags()
  	{
         for ($i=0; $i<$this->numFields; $i++)
  		{
  			$fieldFlags[$i] = mysql_field_flags($this->fieldResult,$i);
  		}
  		return $fieldFlags;
  	}

    //////////////// PRIVAT /////////////////////
    function debug($text)
    {
    		global $globar;
    		if ($globar['debug'])
         {
             print "<font color=".$this->debugColor."><b>DEBUG </b>(mysqladmin - ident: ".$this->dbInt." - db:".$this->dbName." / table:".$this->tabName."): $text</font><br>";
         }
    }
    /////////////////////////////////////////////
}

?>
