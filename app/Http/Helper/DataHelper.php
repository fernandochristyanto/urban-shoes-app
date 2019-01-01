<?php
namespace App\Http\Helper;

class DataHelper{
  public static function getStsrc(){
    return [
      'A' => 'Active',
      'U' => 'Updated',
      'D' => 'Deleted'
    ];
  }

  public static function getScrapApprovalStatuses(){
    return  [
      'P' => 'Pending',
      'A' => 'Active',
      'F' => 'Finished',
      'D' => 'Declined'
    ];
  }
}
?>