#include "stdafx.h"
#include "FlyBehaviors.h"

std::function<void()> FlyBehaviors::GetFlyNoWay()
{
	return [] {};
}

std::function<void()> FlyBehaviors::GetFlyWithWings()
{
	unsigned flightCount = 0;
	return [=]() mutable {
		std::cout << "Flight: " << ++flightCount << ". " << "I'm flying with wings!!" << std::endl;
	};
}