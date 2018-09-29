#include "stdafx.h"
#include "DecoyDuck.h"

DecoyDuck::DecoyDuck()
	: Duck(std::make_unique<FlyNoWay>(), std::make_unique<MuteQuackBehavior>())
{
}

void DecoyDuck::Display() const
{
	std::cout << "I'm decoy duck" << std::endl;
}