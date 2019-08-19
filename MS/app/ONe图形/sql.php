<?php

	 	$sql="
CREATE TABLE IF NOT EXISTS `cdro_2019_7_10{$insertid}` (
	 `calldate` datetime NOT NULL default '0000-00-00 00:00:00',
  `clid` varchar(80) NOT NULL default '',
  `src` varchar(80) NOT NULL default '',
  `dst` varchar(80) NOT NULL default '',
  `dcontext` varchar(80) NOT NULL default '',
  `channel` varchar(80) NOT NULL default '',
  `dstchannel` varchar(80) NOT NULL default '',
  `lastapp` varchar(80) NOT NULL default '',
  `lastdata` varchar(80) NOT NULL default '',
  `duration` int(11) NOT NULL default '0',
  `billsec` int(11) NOT NULL default '0',
  `disposition` varchar(45) NOT NULL default '',
  `amaflags` int(11) NOT NULL default '0',
  `accountcode` varchar(20) NOT NULL default '',
  `uniqueid` varchar(32) NOT NULL default '',
  `userfield` varchar(255) NOT NULL default '',
  `tag` int(1) default '0',
  `outup` int(1) default '0',
  `calltype` char(10) default 'outcall',
  `addtime` timestamp NULL default CURRENT_TIMESTAMP,
  `play` varchar(25) NOT NULL,
  `outbound` varchar(80) default NULL,
  `hangup_src` varchar(80) NOT NULL default '',
  `analysis` int(10) default '0',
  KEY `src` USING BTREE (`src`),
  KEY `dst` (`dst`),
  KEY `uniqueid` (`uniqueid`),
  KEY `calldate` (`calldate`),
  KEY `outup` (`outup`),
  KEY `cdr_outbound` (`outbound`),
  KEY `disposition` (`disposition`),
  KEY `dcontext` (`dcontext`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
$this->sql_get_rows($sql);
private function sql_get_rows($sql,&$rows=null,$type='a') {
		return $this->getdatax($sql,$rows,$type);
	}
 function getdatax($sql,&$arrData=null,$type='a'){
        if($arrData===null) $arrData=array();
        $result=mysql_query($sql);
    	if($result){
            if($type=='a'):
                while(($row=mysql_fetch_assoc($result))){
                    $arrData[]= $row;
                }
            elseif($type=='n'):
                while(($row=mysql_fetch_array($result,MYSQL_NUM))) {
                    $arrData[]= $row;
                }
            else:
                while(($row=mysql_fetch_array($result,MYSQL_BOTH))){
                    $arrData[]= $row;
                }
            endif;
    	}
    	return $arrData;
    }