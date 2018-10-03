#pragma once
#include <functional>
#include <iostream>

namespace FlyBehavior
{
	std::function<void()> GetFlyNoWay()
	{
		return [] {};
	}

	std::function<void()> GetFlyWithWings()
	{
		unsigned flightCount = 0;
		return [=] () mutable {
			std::cout << "Flight: " << ++flightCount << ". " << "I'm flying with wings!!" << std::endl;
		};
	}
}
