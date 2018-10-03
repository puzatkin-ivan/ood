#include "stdafx.h"
#include "MallardDuck.h"

MallardDuck::MallardDuck()
	: Duck(FlyBehavior::GetFlyWithWings(),
		QuackBehavior::GetQuackBehavior(),
		DanceBehavior::GetWaltzDanceBehavior())
{
}

void MallardDuck::Display() const
{
	std::cout << "I'm mallard duck" << std::endl;
}