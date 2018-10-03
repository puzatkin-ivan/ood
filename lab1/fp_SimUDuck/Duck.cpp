#include "stdafx.h"
#include "Duck.h"

Duck::Duck(std::function<void()>&& flyBehavior,
	std::function<void()>&& quackBehavior,
	std::function<void()>&& danceBehavior)
	:m_quackBehavior(std::move(quackBehavior))
	,m_danceBehavior(std::move(danceBehavior))
{
	assert(m_quackBehavior);
	assert(m_danceBehavior);
	SetFlyBehavior(std::move(flyBehavior));
}

void Duck::Quack() const
{
	m_quackBehavior();
}

void Duck::Swim()
{
	std::cout << "I'm swimming" << std::endl;
}

void Duck::Fly()
{
	m_flyBehavior();
}

void Duck::Dance()
{
	m_danceBehavior();
}

void Duck::SetFlyBehavior(std::function<void()>&& flyBehavior)
{
	assert(flyBehavior);
	m_flyBehavior = std::move(flyBehavior);
}