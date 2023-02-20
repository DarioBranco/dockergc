from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class energy_meters_individual(Base):
	__tablename__ = 'energy_meters_individual'
	id = Column(Integer, primary_key=True)
	MeterID = Column(Text)
	LOC = Column(Text)
	EntryTime = Column(Text)
	ExitTime = Column(Text)

