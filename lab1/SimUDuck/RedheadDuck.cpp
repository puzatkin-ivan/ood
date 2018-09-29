#include "stdafx.h"
#include "RedheadDuck.h"

RedheadDuck::RedheadDuck()
	: Duck(std::make_unique<FlyWithWings>(),
		std::make_unique<QuackBehavior>(),
		std::make_unique<MinuetDanceBehavior>())
{
}

void RedheadDuck::Display() const
{
	std::cout << "I'm redhead duck" << std::endl;
}