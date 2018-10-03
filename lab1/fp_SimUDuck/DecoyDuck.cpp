#include "stdafx.h"
#include "DecoyDuck.h"

DecoyDuck::DecoyDuck()
	: Duck(FlyBehavior::GetFlyNoWay(),
		QuackBehavior::GetMuteQuackBehavior(),
		DanceBehavior::GetNoDanceBehavior())
{
}

void DecoyDuck::Display() const
{
	std::cout << "I'm decoy duck" << std::endl;
}