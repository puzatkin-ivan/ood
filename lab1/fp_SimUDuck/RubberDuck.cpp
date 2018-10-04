#include "stdafx.h"
#include "RubberDuck.h"

RubberDuck::RubberDuck()
	:Duck(FlyBehaviors::GetFlyNoWay(),
		QuackBehaviors::GetSqueakBehavior(),
		DanceBehaviors::GetNoDanceBehavior())
{
}

void RubberDuck::Display() const
{
	std::cout << "I'm rubber duck" << std::endl;
}