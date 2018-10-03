#include "stdafx.h"
#include "RedheadDuck.h"

RedheadDuck::RedheadDuck()
	: Duck(FlyBehavior::GetFlyWithWings(),
		QuackBehavior::GetQuackBehavior(),
		DanceBehavior::GetMinuetDanceBehavior())
{
}

void RedheadDuck::Display() const
{
	std::cout << "I'm redhead duck" << std::endl;
}