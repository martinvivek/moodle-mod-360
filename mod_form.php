<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.'); // It must be included from a Moodle page.
}

global $CFG;

require_once($CFG->dirroot.'/course/moodleform_mod.php');

class mod_threesixty_mod_form extends moodleform_mod {

    public function definition() {
        $mform =& $this->_form;

        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'name', get_string('name'), array('size'=>'64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');

        $competenciescarried = array();
        for ($i=1; $i<=10; $i += 1) {
            $competenciescarried[$i] = $i;
        }
        $mform->addElement('select', 'competenciescarried', get_string('competenciescarried', 'threesixty'), $competenciescarried);
        $mform->setDefault('competenciescarried', 3);
        $mform->addHelpButton('competenciescarried', 'competenciescarried', 'threesixty');
        $requiredrespondents = array();
        for ($i=0; $i<=20; $i += 1) {
            $requiredrespondents[$i] = $i;
        }
        $mform->addElement('select', 'requiredrespondents', get_string('requiredrespondents', 'threesixty'), $requiredrespondents);
        $mform->setDefault('requiredrespondents', 10);
        $mform->addHelpButton('requiredrespondents', 'requiredrespondents', 'threesixty');

        $features = new stdClass;
        $features->groups = false;
        $features->groupings = false;
        $features->groupmembersonly = false;
        $features->outcomes = false;
        $features->gradecat = false;
        $features->idnumber = false;
        $this->standard_coursemodule_elements(/*was: $features*/);
        $this->add_action_buttons();

    }
}
