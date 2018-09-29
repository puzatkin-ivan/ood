#include "stdafx.h"
#include "RubberDuck.h"

RubberDuck::RubberDuck()
	:Duck(std::make_unique<FlyNoWay>(), std::make_unique<SqueakBehavior>())
{
}

void RubberDuck::Display() const
{
	std::cout << "I'm rubber duck" << std::endl;
}