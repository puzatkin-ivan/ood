#pragma once
#include <iostream>

struct IDanceBehavior
{
public:
	virtual ~IDanceBehavior() {};
	virtual void Dance() = 0;
};

class WaltzDanceBehavior : public IDanceBehavior
{
	void Dance() override;
};

class MinuetDanceBehavior : public IDanceBehavior
{
	void Dance() override;
};

class NoDanceBehavior : public IDanceBehavior
{
public:
	void Dance() override {}
};