<?php

$awork = new Awork();

$awork->getAbsences();
$awork->createAbsences();
$awork->getAbsence($id);
$awork->updateAbsence($id, $data);
$awork->deleteAbsence($id);

Absense::all();
Absense::get();


/* Needed entities
 *
 * Comment
 * Company
 * ProjectMilestone
 * Project
 * ProjectStatus
 * ProjectTemplate
 * ProjectType
 * Task
 * TaskStatus
 */

class Awork
{

}
