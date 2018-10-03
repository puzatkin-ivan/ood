#pragma once
#include "WeatherInfo.h"

struct IStreamBehaviors
{
	virtual ~IStreamBehaviors() {};
	virtual void Stream(const SWeatherInfo& data) = 0;
};

class TemperatureStreamBehaviors : public IStreamBehaviors
{
public:
	void Stream(const SWeatherInfo& data)
	{
		if (m_minTemperature > data.temperature)
		{
			m_minTemperature = data.temperature;
		}
		if (m_maxTemperature < data.temperature)
		{
			m_maxTemperature = data.temperature;
		}
		m_accTemperature += data.temperature;
		++m_countAcc;

		std::cout << "Max Temp " << m_maxTemperature << std::endl;
		std::cout << "Min Temp " << m_minTemperature << std::endl;
		std::cout << "Average Temp " << (m_accTemperature / m_countAcc) << std::endl;
		std::cout << "----------------" << std::endl;
	}

private:
	double m_minTemperature = std::numeric_limits<double>::infinity();
	double m_maxTemperature = -std::numeric_limits<double>::infinity();
	double m_accTemperature = 0;
	unsigned m_countAcc = 0;
};

class HumidityStreamBehaviors : public IStreamBehaviors
{
public:
	void Stream(const SWeatherInfo& data)
	{
		if (m_minHumidity > data.humidity)
		{
			m_minHumidity = data.humidity;
		}
		if (m_maxHumidity < data.humidity)
		{
			m_maxHumidity = data.humidity;
		}
		m_accHumidity += data.humidity;
		++m_countAcc;

		std::cout << "Max Humidity " << m_maxHumidity << std::endl;
		std::cout << "Min Humidity " << m_minHumidity << std::endl;
		std::cout << "Average Humidity " << (m_accHumidity / m_countAcc) << std::endl;
		std::cout << "----------------" << std::endl;
	}

private:
	double m_minHumidity = std::numeric_limits<double>::infinity();
	double m_maxHumidity = -std::numeric_limits<double>::infinity();
	double m_accHumidity = 0;
	unsigned m_countAcc = 0;
};

class PressureStreamBehaviors : public IStreamBehaviors
{

public:
	void Stream(const SWeatherInfo& data)
	{
		if (m_minPressure > data.pressure)
		{
			m_minPressure = data.pressure;
		}
		if (m_maxPressure < data.pressure)
		{
			m_maxPressure = data.pressure;
		}
		m_accPressure += data.pressure;
		++m_countAcc;

		std::cout << "Max Pressure " << m_maxPressure << std::endl;
		std::cout << "Min Pressure " << m_minPressure << std::endl;
		std::cout << "Average Pressure " << (m_accPressure / m_countAcc) << std::endl;
		std::cout << "----------------" << std::endl;
	}

private:
	double m_minPressure = std::numeric_limits<double>::infinity();
	double m_maxPressure = -std::numeric_limits<double>::infinity();
	double m_accPressure = 0;
	unsigned m_countAcc = 0;
};
