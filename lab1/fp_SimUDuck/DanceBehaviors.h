#pragma once
#include <functional>
#include <iostream>

namespace DanceBehaviors
{
std::function<void()> GetWaltzDanceBehavior();

std::function<void()> GetMinuetDanceBehavior();

std::function<void()> GetNoDanceBehavior();
}
