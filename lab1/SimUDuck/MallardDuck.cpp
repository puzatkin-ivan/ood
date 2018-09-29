#include "stdafx.h"
#include "MallardDuck.h"

MallardDuck::MallardDuck()
	: Duck(std::make_unique<FlyWithWings>(), std::make_unique<QuackBehavior>())
{
}

void MallardDuck::Display() const
{
	std::cout << "I'm mallard duck" << std::endl;
}