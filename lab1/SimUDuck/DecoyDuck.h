#pragma once
#include "Duck.h"

class DecoyDuck : public Duck
{
public:
	DecoyDuck();
	void Display() const override;
	void Dance() override {}
};