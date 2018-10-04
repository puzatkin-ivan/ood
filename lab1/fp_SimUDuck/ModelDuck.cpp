#include "stdafx.h"
#include "ModelDuck.h"

ModelDuck::ModelDuck()
	: Duck(FlyBehaviors::GetFlyNoWay(),
		QuackBehaviors::GetQuackBehavior(),
		DanceBehaviors::GetNoDanceBehavior())
{
}

void ModelDuck::Display() const
{
	std::cout << "I'm model duck" << std::endl;
}