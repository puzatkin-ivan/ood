#pragma once
#include <functional>
#include <iostream>

namespace QuackBehaviors
{
std::function<void()> GetQuackBehavior();

std::function<void()> GetSqueakBehavior();

std::function<void()> GetMuteQuackBehavior();
}
