#include "stdafx.h"
#include "WeatherData.h"

int main()
{
	CWeatherData wd;

	CDisplay display;
	wd.RegisterObserver(display);

	CStatsDisplay statsDisplayTemperature(std::make_unique<CStatsCalculator>("Temp"));
	wd.RegisterObserver(statsDisplayTemperature);

	CStatsDisplay statsDisplayHumidity(std::make_unique<CStatsCalculator>("Humidity"));
	wd.RegisterObserver(statsDisplayHumidity);

	CStatsDisplay statsDisplayPressure(std::make_unique<CStatsCalculator>("Pressure"));
	wd.RegisterObserver(statsDisplayPressure);

	wd.SetMeasurements(3, 0.7, 760);
	wd.SetMeasurements(4, 0.8, 761);

	wd.RemoveObserver(statsDisplayTemperature);

	wd.SetMeasurements(10, 0.8, 761);
	wd.SetMeasurements(-10, 0.8, 761);
	return 0;
}