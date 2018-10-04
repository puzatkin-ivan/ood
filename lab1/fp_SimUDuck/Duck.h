#pragma once
#include <cassert>
#include <functional>
#include <iostream>

#include "DanceBehaviors.h"
#include "FlyBehaviors.h"
#include "QuackBehaviors.h"

class Duck
{
public:
	Duck(std::function<void()>&& flyBehavior,
		std::function<void()>&& quackBehavior,
		std::function<void()>&& danceBehavior);

	void Quack() const;
	void Swim();
	void Fly();
	void Dance();

	void SetFlyBehavior(std::function<void()>&& flyBehavior);
	virtual void Display() const = 0;
	virtual ~Duck() = default;

private:
	std::function<void()> m_flyBehavior;
	std::function<void()> m_quackBehavior;
	std::function<void()> m_danceBehavior;
};