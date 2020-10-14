<?php

use Codeception\Scenario;
use Step\Acceptance\SearchFormSteps;

class TubeCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, Scenario $scenario) {
    	$I->wantTo('want to test something');
    	$I->amOnPage('/');
    	$searchFormSteps = new SearchFormSteps($scenario);
    	$searchFormSteps->aaa();
    }
}
