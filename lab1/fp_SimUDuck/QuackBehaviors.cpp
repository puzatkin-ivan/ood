#include "stdafx.h"
#include "QuackBehaviors.h"

std::function<void()> QuackBehaviors::GetQuackBehavior()
{
	return [] {
		std::cout << "Quack Quack!!!" << std::endl;
	};
}

std::function<void()> QuackBehaviors::GetSqueakBehavior()
{
	return [] {
		std::cout << "Squeek!!!" << std::endl;
	};
}

std::function<void()> QuackBehaviors::GetMuteQuackBehavior()
{
	return [] {};
}
