#pragma once
#include <functional>
#include <iostream>

namespace QuackBehavior
{
	std::function<void()> GetQuackBehavior()
	{
		return [] {
			std::cout << "Quack Quack!!!" << std::endl;
		};
	}

	std::function<void()> GetSqueakBehavior()
	{
		return [] {
			std::cout << "Squeek!!!" << std::endl;
		};
	}

	std::function<void()> GetMuteQuackBehavior()
	{
		return [] {};
	}
}
