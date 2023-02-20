from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class measured_weather_data(Base):
	__tablename__ = 'measured_weather_data'
	id = Column(Integer, primary_key=True)
	LOC = Column(Text)
	SensorID = Column(Text)
	Time = Column(Text)
	Type = Column(Text)
	Unit = Column(Text)
	startPoint = Column(Text)
	endPoint = Column(Text)
	pathTofile = Column(Text)
