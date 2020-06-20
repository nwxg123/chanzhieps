<?php
$config->user->require->registerGuest = 'account,nickname';
/* Add tocken to skipedFields for chanzhi7.5. */
$config->user->skipedFields->create = 'ip,fingerprint,private,emailCertified,mobileCertified,registerAgreement,token';
