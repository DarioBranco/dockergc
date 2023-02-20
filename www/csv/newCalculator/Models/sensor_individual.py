from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class sensor_individual(Base):
	__tablename__ = 'sensor_individual'
	id = Column(Integer, primary_key=True)
	SensorID = Column(Text)
	LOC = Column(Text)
	EntryTime = Column(Text)
	ExitTime = Column(Text)
	MakeM = Column(Text)

