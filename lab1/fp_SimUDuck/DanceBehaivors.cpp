#include "stdafx.h"
#include "DanceBehaviors.h"

std::function<void()> DanceBehaviors::GetWaltzDanceBehavior()
{
	return [] {
		std::cout << "I'm dancing waltz." << std::endl;
	};
}

std::function<void()> DanceBehaviors::GetMinuetDanceBehavior()
{
	return [] {
		std::cout << "I'm dancing minuet." << std::endl;
	};
}

std::function<void()> DanceBehaviors::GetNoDanceBehavior()
{
	return [] {};
}