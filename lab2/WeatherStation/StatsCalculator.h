#pragma once
#include "WeatherInfo.h"
#include <iostream>
#include <algorithm>
#include <string>

struct IStatsCalculator
{
	virtual ~IStatsCalculator() {};
	virtual void Stream(const SWeatherInfo& data) = 0;
};

class CStatsCalculator : public IStatsCalculator
{
public:
	CStatsCalculator(const std::string& type)
		:m_type(type)
	{
	}


	void Stream(const SWeatherInfo& data)
	{
		m_minTemperature = std::min(m_minTemperature, data.temperature);
		m_maxTemperature = std::max(m_maxTemperature, data.temperature);
		m_accTemperature += data.temperature;
		++m_countAcc;

		std::cout << "Max " << m_type << " " << m_maxTemperature << std::endl;
		std::cout << "Min " << m_type << " " << m_minTemperature << std::endl;
		std::cout << "Average " << m_type << " " << (m_accTemperature / m_countAcc) << std::endl;
		std::cout << "----------------" << std::endl;
	}

private:
	std::string m_type;
	double m_minTemperature = std::numeric_limits<double>::infinity();
	double m_maxTemperature = -std::numeric_limits<double>::infinity();
	double m_accTemperature = 0;
	unsigned m_countAcc = 0;
};
