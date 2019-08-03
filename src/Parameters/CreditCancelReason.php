<?php 

namespace Buonzz\Epoch\CustomerSearch\Parameters;

class CreditCancelReason 
{ 
    const BANK_CALL = 'bankcall';  // Phone/Email Request from Issuing Bank
    const BANK_LTR = 'bankltr'; // Cancellation Letter Sent From Bank
    const CRD_CBK = 'crdcbk'; // Transaction after Chargeback
    const DISP_BNUS = 'dispbnus'; // Dispute over Bonus sites
   	const MINOR_XS = 'minorxs'; // Minor Accessed
   	const NO_ACCESS = 'noaccess'; // Login/Access Problems
   	const PEND_CBCK = 'pendcbck'; // Pending Chargeback
   	const WMA_APPRVD = 'wmapprvd'; // Webmaster Approved
   	const CAN_SAMDY = 'cansamdy'; // Cancellation After Same Day Rebill (or Reasonable Time Allotment)
   	const DUP_CHARG = 'dupcharg'; // Duplicate Charge
   	const FDLS_TSTL = 'fdlststl'; // Fraud (card lost/stolen)
   	const FD_NOTME = 'fdnotme'; // Fraud ("I didn't do it" or "I don't recognize the transaction")
   	const PREV_CANC = 'prevcanc'; // Previously Cancelled
   	const RS_FRAUD = 'rsfraud'; // Reseller Fraud
   	const SITE_PROB = 'siteprob'; // Site Technical Problem
   	const TRMS_NCON = 'trmsncon'; // Terms and Conditions

    private $value;

    public function __construct($value){
      $this->setValue($value);
    }

    public function getName(){
      return 'credit_reason';
    }

    public function getValue(){ return $this->value;}

    public function setValue($value){
      $this->value = $this->validate($value);   
    }

    public function validate($value){

      $reasons_valid_values = array_values(CreditCancelReason::getConstants());
        if(!in_array($value, $reasons_valid_values))
           throw new \InvalidArgumentException("credit_reason parameter in Epoch's Customer Search API needs to be a valid credit_reason, ". $value . " given.");


      return $value;
    }

    static function getConstants() {
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}

