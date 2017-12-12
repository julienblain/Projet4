<?php

namespace App\Table;
use Core\Table\Table;

class ReportedTable extends Table {

    protected $table = 'reported';

    public function countIpReported($addressIp) {
        return $this->countPrepare(
            "SELECT countReported FROM reported
            WHERE reported.addressIpReported = '{$addressIp}'"
        );
    }

    public function addUserReporting($addressIp, $countReported) {
        return $this->insertInto(
            ('INSERT INTO reported(addressIpReported, countReported)
            VALUES(:addressIp, :countReported)'),

            (array(
                'addressIp' => $addressIp,
                'countReported' => $countReported
            ))
        );
    }

    public function addReporting($addressIp, $countReported) {
        return $this->updateOne(
            "UPDATE reported SET countReported = {$countReported}
            WHERE addressIpReported = {$addressIp}");

    }

}
