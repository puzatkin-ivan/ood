#include "stdafx.h"

#include "FlyBehaviors.h"

void FlyWithWings::Fly()
{
	std::cout << "Flight: " << ++m_flightCount << ". " << "I'm flying with wings!!" << std::endl;
}
