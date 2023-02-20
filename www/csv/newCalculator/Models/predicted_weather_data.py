from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class predicted_weather_data(Base):
	__tablename__ = 'predicted_weather_data'
	id = Column(Integer, primary_key=True)
	LOC = Column(Text)
	Time = Column(Text)
	PredTime = Column(Text)
	Unit = Column(Text)
	startPoint = Column(Text)
	endPoint = Column(Text)
	pathTofile = Column(Text)
