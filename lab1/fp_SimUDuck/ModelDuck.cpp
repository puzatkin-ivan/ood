#include "stdafx.h"
#include "ModelDuck.h"

ModelDuck::ModelDuck()
	: Duck(FlyBehavior::GetFlyNoWay(),
		QuackBehavior::GetQuackBehavior(),
		DanceBehavior::GetNoDanceBehavior())
{
}

void ModelDuck::Display() const
{
	std::cout << "I'm model duck" << std::endl;
}