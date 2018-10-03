#include "stdafx.h"
#include "RubberDuck.h"

RubberDuck::RubberDuck()
	:Duck(FlyBehavior::GetFlyNoWay(),
		QuackBehavior::GetSqueakBehavior(),
		DanceBehavior::GetNoDanceBehavior())
{
}

void RubberDuck::Display() const
{
	std::cout << "I'm rubber duck" << std::endl;
}