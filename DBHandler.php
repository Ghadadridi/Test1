<?php

/**
 * This file is part of gruppe4/umfrage-zero-waste.
 *
 * Copyright (c) 2019 Gruppe 4
 *
 * @package   gruppe4/umfrage-zero-waste
 * @author    Wilfried Hehr <hehrwil@uni-hildesheim.de>
 * @author    Vanessa Brinkmann <brink005@uni-hildesheim.de>
 * @author    Ghada Dridi <dridig@uni-hildesheim.de>
 * @author    Richard Henkenjohann <henkenjo@uni-hildesheim.de>
 * @author    Johanan Zellmer <zellmer@uni-hildesheim.de>
 * @copyright 2019 Gruppe 4
 * @license   LICENSE proprietary
 */

require_once 'DBConfig.php';

/**
 * Class DBHandler
 */
class DBHandler extends DBConfig
{

    /**
     * Fetches all answers.
     *
     * @return array
     */
    public function ladeErgebnisse(): array
    {
        $sqlAnfrage = <<<SQL
SELECT antwort.id AS antwortId, teilnehmerId, fragenId, `value` AS antwort,  `alter`,  geschlecht, frage FROM antwort
INNER JOIN teilnehmer ON teilnehmer.id=antwort.teilnehmerId
INNER JOIN frage ON frage.id=antwort.fragenId ORDER BY `teilnehmerId`

SQL;
        $sqlQuery = $sqlAnfrage or die ('Error in the consult…' . mysqli_error($this->connectionStringPHP));

        $result = mysqli_query($this->connectionStringPHP, $sqlQuery);

        $ergebnisse = array();

        while ($row = $result->fetch_assoc()) {
            $tid=$row['teilnehmerId'];
            $fid=$row['fragenId'];
            $ergebnisse[$tid][$fid] = $row['antwort'];
            $alter=$row['alter'];
            $geschlecht=$row['geschlecht'];
            $ergebnisse[$tid]['alter'] = $alter;
            $ergebnisse[$tid]['geschlecht'] = $geschlecht;
        }

        return $ergebnisse;
    }

    /**
     * Creates an participant and returns their ID.
     *
     * @param string $alter      The age of the participant.
     * @param string $geschlecht The sex of the participant.
     *
     * @return int The new auto-generated participant ID.
     *
     * @throws Exception
     */
    public function speichereTeilnehmer(string $alter, string $geschlecht): int
    {
        if ($sqlQuery = mysqli_prepare(
            $this->connectionStringPHP,
            'INSERT INTO teilnehmer (`id`,`alter`, `geschlecht`) VALUES (NULL,?,?)'
        )) {
            mysqli_stmt_bind_param(
                $sqlQuery,
                'ss',
                $alter,
                $geschlecht
            );

            if (!mysqli_stmt_execute($sqlQuery)) {
                throw new RuntimeException(sprintf("Error: %s.\n", mysqli_stmt_error($sqlQuery)));
            }

            return mysqli_insert_id($this->connectionStringPHP);
        }

        $error = 'mysqli_error: ' . $this->connectionStringPHP->errno;

        throw new RuntimeException($error);
    }

    /**
     * Persists an answer.
     *
     * @param int    $fragenId     The ID of the question.
     * @param int    $teilnehmerId The ID of the participant.
     * @param string $antwort      The answer.
     *
     * @return int The auto-generated id of the answer.
     *
     * @throws Exception
     */
    public function speichereAntwort(int $fragenId, int $teilnehmerId, string $antwort): int
    {
        if ($sqlQuery = mysqli_prepare(
            $this->connectionStringPHP,
            'INSERT INTO antwort (`fragenId`, `teilnehmerId`, `value`) VALUES (?,?,?)'
        )) {
            mysqli_stmt_bind_param(
                $sqlQuery,
                'iis',
                $fragenId,
                $teilnehmerId,
                $antwort
            );

            if (!mysqli_stmt_execute($sqlQuery)) {
                throw new RuntimeException(sprintf("Error: %s.\n", mysqli_stmt_error($sqlQuery)));
            }

            return mysqli_insert_id($this->connectionStringPHP);
        }

        $error = 'mysqli_error: ' . $this->connectionStringPHP->errno;

        throw new RuntimeException($error);
    }

    public function SelectTeilnehmer(string $geschlecht): array
    {
        $sqlAnfrage = <<<SQL
SELECT `id`, `alter`, `geschlecht` FROM `teilnehmer` WHERE `geschlecht`='.$geschlecht.' 

SQL;
        $sqlQuery = $sqlAnfrage or die ('Error in the consult…' . mysqli_error($this->connectionStringPHP));

        $result = mysqli_query($this->connectionStringPHP, $sqlQuery);

        $ergebnisse = array();

        while ($row = $result->fetch_assoc()) {
            $ergebnisse[] = $row;
            $zah=$result->num_rows();
        }

        return $ergebnisse;
    }



}
