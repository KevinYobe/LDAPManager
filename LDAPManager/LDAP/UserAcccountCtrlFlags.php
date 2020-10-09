<?php
namespace LDAP;

abstract class UserAcccountCtrlFlags 
{
    const SCRIPT	=	1;
    const ACCOUNTDISABLE	=	2;
    const HOMEDIR_REQUIRED	=	8;
    const LOCKOUT	= 	16;
    const PASSWD_NOTREQD	=	32;
    const PASSWD_CANT_CHANGE = 64;
    const ENCRYPTED_TEXT_PWD_ALLOWED	=	128;
    const TEMP_DUPLICATE_ACCOUNT	=	256;
    const NORMAL_ACCOUNT	=	512;
    const INTERDOMAIN_TRUST_ACCOUNT	=	2048;
    const WORKSTATION_TRUST_ACCOUNT	=	4096;
    const SERVER_TRUST_ACCOUNT	=	8192;
    const DONT_EXPIRE_PASSWORD	=	65536;
    const MNS_LOGON_ACCOUNT	=	131072;
    const SMARTCARD_REQUIRED	=	262144;
    const TRUSTED_FOR_DELEGATION	=	524288;
    const NOT_DELEGATED	=	1048576;
    const USE_DES_KEY_ONLY	=	2097152;
    const DONT_REQ_PREAUTH	=	4194304;
    const PASSWORD_EXPIRED	=	8388608;
    const TRUSTED_TO_AUTH_FOR_DELEGATION	=	16777216;
    const PARTIAL_SECRETS_ACCOUNT	=	67108864;
    public function __construct()
    {}
    
    
    
}

