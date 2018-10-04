#include "stdafx.h"
#include "DecoyDuck.h"

DecoyDuck::DecoyDuck()
	: Duck(FlyBehaviors::GetFlyNoWay(),
		QuackBehaviors::GetMuteQuackBehavior(),
		DanceBehaviors::GetNoDanceBehavior())
{
}

void DecoyDuck::Display() const
{
	std::cout << "I'm decoy duck" << std::endl;
}