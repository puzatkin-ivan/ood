#pragma once
#include <functional>
#include <iostream>

namespace FlyBehaviors
{
std::function<void()> GetFlyNoWay();

std::function<void()> GetFlyWithWings();
}
