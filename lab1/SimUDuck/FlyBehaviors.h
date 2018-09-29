#pragma once

#include <iostream>

struct IFlyBehavior
{
	virtual ~IFlyBehavior() {};
	virtual void Fly() = 0;
};

class FlyWithWings : public IFlyBehavior
{
public:
	void Fly() override;
private:
	unsigned m_flightCount = 0;
};

class FlyNoWay : public IFlyBehavior
{
public:
	void Fly() override {}
};