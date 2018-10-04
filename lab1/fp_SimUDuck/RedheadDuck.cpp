#include "stdafx.h"
#include "RedheadDuck.h"

RedheadDuck::RedheadDuck()
	: Duck(FlyBehaviors::GetFlyWithWings(),
		QuackBehaviors::GetQuackBehavior(),
		DanceBehaviors::GetMinuetDanceBehavior())
{
}

void RedheadDuck::Display() const
{
	std::cout << "I'm redhead duck" << std::endl;
}