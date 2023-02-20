from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class location_individual(Base):
	__tablename__ = 'location_individual'
	id = Column(Integer, primary_key=True)
	LOC = Column(Text)
	Demo = Column(Text)
	EntryTime = Column(Text)
	ExitTime = Column(Text)
	MeterID = Column(Text)
	MaxPower = Column(Text)