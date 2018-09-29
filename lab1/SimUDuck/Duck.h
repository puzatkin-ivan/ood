#pragma once
#include <cassert>
#include <iostream>
#include <memory>

#include "QuickBehaviors.h"
#include "FlyBehaviors.h"

class Duck
{
public:
	Duck(std::unique_ptr<IFlyBehavior>&& flyBehavior,
		std::unique_ptr<IQuackBehavior>&& quackBehavior);

	void Quack() const;
	void Swim();
	void Fly();
	virtual void Dance();

	void SetFlyBehavior(std::unique_ptr<IFlyBehavior>&& flyBehavior);
	virtual void Display() const = 0;
	virtual ~Duck() = default;

private:
	std::unique_ptr<IFlyBehavior> m_flyBehavior;
	std::unique_ptr<IQuackBehavior> m_quackBehavior;
};