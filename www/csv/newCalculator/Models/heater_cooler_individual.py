from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class heater_cooler_individual(Base):
	__tablename__ = 'heater_cooler_individual'
	id = Column(Integer, primary_key=True)
	HCID = Column(Text)
	LOC = Column(Text)
	EntryTime = Column(Text)
	ExitTime = Column(Text)
	MakeM = Column(Text)
