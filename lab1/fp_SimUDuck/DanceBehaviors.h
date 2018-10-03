#pragma once
#include <functional>
#include <iostream>

namespace DanceBehavior
{
	std::function<void()> GetWaltzDanceBehavior()
	{
		return [] {
			std::cout << "I'm dancing waltz." << std::endl;
		};
	}

	std::function<void()> GetMinuetDanceBehavior()
	{
		return [] {
			std::cout << "I'm dancing minuet." << std::endl;
		};
	}

	std::function<void()> GetNoDanceBehavior()
	{
		return [] {};
	}
}
