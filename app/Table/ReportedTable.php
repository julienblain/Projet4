<?php

namespace App\Table;
use Core\Table\Table;

class ReportedTable extends Table {

    protected $table = 'reported';

    public function count($email) {
        return $this->countPrepare(
            "SELECT COUNT(*) FROM reported
            WHERE reported.mailReported = '{$email}'"
        );

    }

    public function addEmail($email) {
        return $this->insertInto(
            ('INSERT INTO reported(mailReported)
            VALUES(:email)'),

            (array('email' => $email))
        );
    }

    




}
