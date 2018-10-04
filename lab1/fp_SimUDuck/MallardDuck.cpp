#include "stdafx.h"
#include "MallardDuck.h"

MallardDuck::MallardDuck()
	: Duck(FlyBehaviors::GetFlyWithWings(),
		QuackBehaviors::GetQuackBehavior(),
		DanceBehaviors::GetWaltzDanceBehavior())
{
}

void MallardDuck::Display() const
{
	std::cout << "I'm mallard duck" << std::endl;
}