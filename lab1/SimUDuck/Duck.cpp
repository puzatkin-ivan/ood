#include "stdafx.h"
#include "Duck.h"

Duck::Duck(std::unique_ptr<IFlyBehavior>&& flyBehavior,
	std::unique_ptr<IQuackBehavior>&& quackBehavior)
	:m_quackBehavior(std::move(quackBehavior))
{
	assert(m_quackBehavior);
	SetFlyBehavior(std::move(flyBehavior));
}

void Duck::Quack() const
{
	m_quackBehavior->Quack();
}

void Duck::Swim()
{
	std::cout << "I'm swimming" << std::endl;
}

void Duck::Fly()
{
	m_flyBehavior->Fly();
}

void Duck::Dance()
{
	std::cout << "I'm Dancing" << std::endl;
}

void Duck::SetFlyBehavior(std::unique_ptr<IFlyBehavior>&& flyBehavior)
{
	assert(flyBehavior);
	m_flyBehavior = std::move(flyBehavior);
}