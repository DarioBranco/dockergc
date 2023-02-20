from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class solar_plant_session(Base):
	__tablename__ = 'solar_plant_session'
	id = Column(Integer, primary_key=True)
	PlantID = Column(Text)
	Time = Column(Text)
	PriceListID = Column(Text)
	SwID = Column(Text)
	startPoint = Column(Text)
	endPoint = Column(Text)
	pathTofile = Column(Text)

